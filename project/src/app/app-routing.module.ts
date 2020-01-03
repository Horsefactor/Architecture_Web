import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { PostsComponent } from './posts/posts.component';
import { AccountComponent } from './account/account.component';
import { LoginComponent } from './security/login/login.component';
import { PageNotFoundComponent } from './page-not-found/page-not-found.component';
import { HomeComponent } from './home/home.component';
import { SignUpComponent } from './security/sign-up/sign-up.component';
import { PostViewComponent } from './posts/post-view/post-view.component';
import { NewCategoryComponent } from './categories/new-category/new-category.component';
import { AuthGuard } from './auth/auth.guard';
import { NewPostComponent } from './posts/new-post/new-post.component';
import { MyPostsComponent } from './posts/my-posts/my-posts.component';


const routes: Routes = [
  {path: '', component: HomeComponent, pathMatch: 'full'},
  {path: 'account', component: AccountComponent, canActivate: [AuthGuard]},
  {path: 'account/edit', component: SignUpComponent, canActivate: [AuthGuard]},
  {path: 'posts', component: PostsComponent},
  {path: 'posts/:id', component:PostViewComponent, canActivate: [AuthGuard]},
  {path: 'posts/edit/:id', component:NewPostComponent, canActivate: [AuthGuard]},
  {path: 'myPosts/:id', component:PostViewComponent, canActivate: [AuthGuard]},
  {path: 'login', component: LoginComponent},
  {path: 'signup', component: SignUpComponent},
  {path: 'newCategory', component: NewCategoryComponent, canActivate: [AuthGuard]},
  {path: 'category/edit/:id', component: NewCategoryComponent, canActivate: [AuthGuard]},
  {path: 'newPost', component: NewPostComponent, canActivate: [AuthGuard]},
  {path: 'myPosts', component: MyPostsComponent, canActivate: [AuthGuard]},


  //otherwise return to home
  {path: "**", component: PageNotFoundComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})

export class AppRoutingModule { }
export const routingComponents = [
  PostsComponent,
  PostViewComponent,
  AccountComponent,
  LoginComponent,
  PageNotFoundComponent,
  HomeComponent,
  NewCategoryComponent,
  SignUpComponent,
  NewPostComponent,
  MyPostsComponent
];
