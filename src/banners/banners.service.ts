import { BadRequestException, Injectable, NotFoundException } from '@nestjs/common';
import { CreateBannerDto } from './dto/create-banner.dto';
import { UpdateBannerDto } from './dto/update-banner.dto';
import { Banner } from './schemas/banner.schemas';
import { InjectModel } from '@nestjs/mongoose';
import mongoose, { Model } from 'mongoose';

@Injectable()
export class BannersService {
  constructor(@InjectModel(Banner.name) private BannerModel: Model<Banner>){}
  
  async create(createBannerDto: CreateBannerDto) {
    const banner = await this.BannerModel.create(createBannerDto);
    return banner;
  }

  findAll() {
    return this.BannerModel.find();
  }

  findOne(id: string) {
    return this.BannerModel.findById(id);
  }

  async update(id: string, updateBannerDto: UpdateBannerDto) {
    const banner = await this.BannerModel.findByIdAndUpdate(id, updateBannerDto);
    if (!banner) {
      throw new NotFoundException('Banner not found');
    }
    return banner;
  }

  remove(id: string) {
    if(!mongoose.Types.ObjectId.isValid(id)) throw new BadRequestException('Invalid banner id');
    return this.BannerModel.findByIdAndDelete(id);
  }
}
