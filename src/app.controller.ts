import { Controller, Get, Param, Post, Request, UseGuards } from '@nestjs/common';
import { AppService } from './app.service';
import { LocalAuthGuard } from './auth/local-auth.guard';
import { AuthService } from './auth/auth.service';
import { ConfigService } from '@nestjs/config';
import { JwtAuthGuard } from './auth/jwt-auth.guard';
import { Public } from './decorators/customize';

@Controller()
export class AppController {
  constructor(
    private readonly appService: AppService,
    private configService: ConfigService,
    private authService: AuthService,
  ) {}

  @Get()
  home() {
    return this.appService.getHomeData();
  } 

  @Get('products')
  getProducts() {
    return this.appService.findAllProducts();
  }

  @Get('products/:id')
  getProductById(@Param('id') id: string) {
    return this.appService.findProductById(id);
  }

  @Public()
  @UseGuards(LocalAuthGuard)
  @Post('auth/login')
  handleLogin(@Request() req: any) {
    return this.authService.login(req.user);
  }

  @Get('profile')
  getProfile(@Request() req: any) {
    return req.user;
  }


}
