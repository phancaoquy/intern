import { IsEmail, IsNotEmpty, IsPhoneNumber, IsString, MinLength, IsEnum, IsOptional } from 'class-validator';
import { UserRole } from '../schemas/user.schema';

export class CreateUserDto {
  @IsString()
  @IsNotEmpty()
  firstName: string;

  @IsString()
  @IsNotEmpty()
  lastName: string;

  @IsEmail({}, { message: 'Please enter a valid email' })
  @IsNotEmpty()
  email: string;

  @IsNotEmpty()
  @MinLength(8, { message: 'Password must be at least 8 characters long' })
  password: string;

  @IsNotEmpty()
  @IsPhoneNumber('VN')  
  phone: string;

  @IsOptional()
  @IsEnum(UserRole)
  role?: UserRole;
}
