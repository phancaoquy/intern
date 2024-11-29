import { IsBoolean, IsEnum, IsNotEmpty, IsString } from "class-validator";
import { BannerCategory } from "../schemas/banner.schemas";

export class CreateBannerDto {
  @IsNotEmpty()
  @IsString()
  title: string;

  @IsNotEmpty()
  @IsString()
  image: string;

  @IsNotEmpty()
  @IsString()
  description: string;

  @IsNotEmpty()
  @IsEnum(BannerCategory)
  category: BannerCategory;

  @IsNotEmpty()
  isHeroBanner: boolean;

  @IsNotEmpty()
  @IsString()
  link: string;
}
