import { Prop, Schema, SchemaFactory } from '@nestjs/mongoose';
import { Document } from 'mongoose';
 
export enum ProductCategory {
  SHOES = 'shoes',
  CLOTHING = 'clothing',
  ACCESSORIES = 'accessories',
  SPORTS = 'sports',
  EQUIPMENT = 'equipment'
}

export enum Brand {
  NIKE = 'nike',
  ADIDAS = 'adidas',
  PUMA = 'puma',
  REEBOK = 'reebok',
  UNDER_ARMOUR = 'under_armour',
  NEW_BALANCE = 'new_balance'
}


@Schema({ timestamps: true, toJSON: { virtuals: true }, toObject: { virtuals: true } })
export class Product extends Document {
  @Prop({ required: true })
  name: string;

  @Prop({ required: true })
  description: string;

  @Prop({ required: true, min: 0 })
  price: number;

  @Prop({ type: [String], required: true })
  images: string[];

  @Prop({
    type: String,
    enum: ProductCategory,
    required: true
  })
  category: ProductCategory;

  @Prop({
    type: String,
    enum: Brand,
    required: true
  })
  brand: Brand;

  @Prop({ required: true, min: 0 })
  saleQuantity: number;

  @Prop({ required: true, min: 0 })
  stock: number;

  @Prop({ default: false })
  isFeatured: boolean;

  @Prop({ default: 0, min: 0 })
  discount: number;

  @Prop({ type: [String] })
  sizes: string[];

  @Prop({ type: [String] })
  colors: string[];
  
  @Prop()
  createdAt: Date;

  @Prop()
  updatedAt: Date;
}

export const ProductSchema = SchemaFactory.createForClass(Product);
