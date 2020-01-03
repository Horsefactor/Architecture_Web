import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';
import { HttpClientModule, HTTP_INTERCEPTORS } from '@angular/common/http';
import {FormsModule, ReactiveFormsModule} from '@angular/forms';


import { AppRoutingModule, routingComponents } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { PostFilterComponent } from './posts/post-filter/post-filter.component';
import { PostListComponent } from './posts/post-list/post-list.component';
import { LoginComponent } from './security/login/login.component';
import { SignUpComponent } from './security/sign-up/sign-up.component';
import { PostViewComponent } from './posts/post-view/post-view.component';
import { NewCategoryComponent } from './categories/new-category/new-category.component';
import { NewPostComponent } from './posts/new-post/new-post.component';
import { JwtInterceptor } from './auth/auth.jwtInterceptor';
import { ErrorInterceptor } from './auth/auth.errorInterceptor';
import { AlertComponent } from './alert/alert.component';
import { MyPostsComponent } from './posts/my-posts/my-posts.component';
import { PostService } from './shared/posts/post.service';
import { CategoryService } from './shared/categories/category.service';
import { UserService } from './shared/users/user.service';
import { AuthService } from './shared/security/auth.service';
import { AlertService } from './shared/alert/alert.service';

@NgModule({
  declarations: [
    AppComponent,
    routingComponents,
    HomeComponent,
    PostFilterComponent,
    PostListComponent,
    LoginComponent,
    SignUpComponent,
    PostViewComponent,
    NewCategoryComponent,
    NewPostComponent,
    AlertComponent,
    MyPostsComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule,
    FormsModule,
    HttpClientModule,
    ReactiveFormsModule
  ],
  providers: [
    AuthService,
    UserService,
    PostService,
    CategoryService,
    AlertService,
    { provide: HTTP_INTERCEPTORS, useClass: JwtInterceptor, multi: true },
    { provide: HTTP_INTERCEPTORS, useClass: ErrorInterceptor, multi: true },
],
  bootstrap: [AppComponent]
})
export class AppModule { }
