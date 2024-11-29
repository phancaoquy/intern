import { Prop, Schema, SchemaFactory } from '@nestjs/mongoose';
import { Document } from 'mongoose';

export enum BannerCategory {
  NEW_ARRIVAL = 'new_arrival',
  SALE_OFF = 'sale_off',
  TOP_SELLER = 'top_seller',
}

@Schema({ timestamps: true })
export class Banner extends Document {
  @Prop({ required: true })
  title: string;

  @Prop({ required: true })
  image: string;

  @Prop({ required: true })
  description: string;

  @Prop({
    type: String,
    enum: BannerCategory,
    required: true,
  })
  category: BannerCategory;

  @Prop()
  link?: string;

  @Prop({ default: false })
  isHeroBanner: boolean;

  @Prop()
  createdAt: Date;

  @Prop()
  updatedAt: Date;
}

export const BannerSchema = SchemaFactory.createForClass(Banner);
