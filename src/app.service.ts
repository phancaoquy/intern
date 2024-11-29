import { Injectable, NotFoundException } from '@nestjs/common';
import { InjectModel } from '@nestjs/mongoose';
import mongoose, { Model } from 'mongoose';
import { User } from './users/schemas/user.schema';
import { Banner } from './banners/schemas/banner.schemas';
import { Product } from './products/schemas/product.schema';

@Injectable()
export class AppService {
   constructor(
    @InjectModel(Banner.name) private bannerModel: Model<Banner>,
    @InjectModel(Product.name) private productModel: Model<Product>,
    @InjectModel(User.name) private userModel: Model<User>,   
  ) {}            

 async getHomeData() {
    const [banners, newArrivals, topSellers, ambassadors] = await Promise.all([
      // Get all active banners
      this.bannerModel.find({ isActive: true }),

      // Get 8 new arrival products
      this.productModel
        .find({ isActive: true })
        .sort({ createdAt: -1 })
        .limit(8),

      // Get 4 top seller products
      this.productModel
        .find({ isActive: true, isFeatured: true })
        .limit(8),

      // Get 4 ambassadors
      this.userModel
        .find({ role: 'ambassador', isActive: true })
        .select('-password -role -isActive')
        .limit(8),
    ]);

    return {
      banners: {
        hero: banners.find(banner => banner.isHeroBanner === true),
        newArrivals: banners.filter(banner => banner.category === 'new_arrival'),
        saleOff: banners.filter(banner => banner.category === 'sale_off'),
      },
      products: {
        newArrivals,
        topSellers,
      },
      ambassadors,
    };
  }

  findAllProducts() {
    return this.productModel.find({ isActive: true })
        .sort({ createdAt: -1 })
        .limit(20);
  }

  async findProductById(id: string) {
   const product = await this.productModel.findById(id);
    if (!product) {
      throw new NotFoundException('Product not found');
    }
   const relatedProducts = await this.productModel.find({ category: product.category }).limit(8);

  return { product, relatedProducts };
  }
}
