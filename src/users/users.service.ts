import { HttpException, HttpStatus, Injectable } from '@nestjs/common';
import { CreateUserDto } from './dto/create-user.dto';
import { UpdateUserDto } from './dto/update-user.dto';
import { InjectModel } from '@nestjs/mongoose';
import { User } from './schemas/user.schema';
import mongoose, { DeleteResult, Model } from 'mongoose';
import { compareSync, genSalt, hashSync } from 'bcrypt';

@Injectable()
export class UsersService {
  constructor(@InjectModel(User.name) private userModel: Model<User>) {}

  hashPassword = async (password: string) => {
    const salt = await genSalt(10);
    const hash = await hashSync(password, salt);
    return hash;
  };

  async create(createUserDto: CreateUserDto) {
    const email = await this.findByEmail(createUserDto.email);
    if (email) {
      throw new HttpException('Email already exists', HttpStatus.BAD_REQUEST);
    }

    const hashedPassword = await this.hashPassword(createUserDto.password);
    const user = await this.userModel.create({
      ...createUserDto,
      password: hashedPassword,
    });
    return user;
  }

  findAll() {
    return `This action returns all users`;
  }

  findOne(id: string) {
    if (!mongoose.Types.ObjectId.isValid(id)) return 'Invalid User ID';
    return this.userModel.findById(id);
  }

  findByEmail(email: string) {
    return this.userModel.findOne({ email });
  }

  validatePassword(password: string, hash: string) {
    return compareSync(password, hash);
  }

  async update(id: string, updateUserDto: UpdateUserDto) {
    if (!mongoose.Types.ObjectId.isValid(id)) return 'Invalid User ID';
    return await this.userModel.updateOne({ _id: id }, { ...updateUserDto });
  }

  remove(id: string): Promise<DeleteResult> {
    if (!mongoose.Types.ObjectId.isValid(id)) {
      throw new HttpException('Invalid User ID', HttpStatus.BAD_REQUEST);
    }

    return this.userModel.deleteOne({ _id: id });
  }
}
