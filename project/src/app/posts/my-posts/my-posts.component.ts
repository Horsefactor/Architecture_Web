import { Component, OnInit } from '@angular/core';
import { GetPost } from 'src/app/shared/posts/post.model';
import { PostService } from 'src/app/shared/posts/post.service';
import { AuthService } from 'src/app/shared/security/auth.service';
import { User } from 'src/app/shared/users/user.model';
import { CategoryService } from 'src/app/shared/categories/category.service';
import { Router } from '@angular/router';
import { first } from 'rxjs/operators';

@Component({
  selector: 'app-my-posts',
  templateUrl: '../post-list/post-list.component.html',
  styles: ['']
})

export class MyPostsComponent implements OnInit {
  posts:GetPost[];
  currentUserEmail:string;

  constructor(
    private postService : PostService,
    private authService : AuthService,
    private router : Router
    ) { }

  ngOnInit() {
    this.currentUserEmail = this.authService.currentUserValue.email;
    this.loadPosts();
  }

  //load all my posts
  loadPosts() {
    this.postService.getMyPosts()
      .pipe(first())
      .subscribe((data) =>{
        this.posts = data['hydra:member']
      })
  }
  //see details of a post on a click
  seePost(post: { id: number; }){
    this.router.navigate(['/myPosts', post.id]);
  }
  //delete a post on click
  deletePost(post: { id: number; }){
    this.postService.delete(post.id)
      .pipe(first())
      .subscribe(() => this.loadPosts());
  }
  //edit a post on click
  editPost(post: {id :number}){
    this.router.navigate(['/posts/edit', post.id]);
  }

}
