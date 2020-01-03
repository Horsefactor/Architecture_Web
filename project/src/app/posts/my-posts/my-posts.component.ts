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
  currentUser:User;

  constructor(
    private postService : PostService,
    private authService : AuthService,
    private router : Router
    ) { }

  ngOnInit() {
    this.currentUser = this.authService.currentUserValue;
    this.loadPosts();
  }

  loadPosts() {
    this.postService.getMyPosts()
      .pipe(first())
      .subscribe((data) =>{
        this.posts = data['hydra:member']
      })
  }

  seePost(post: { id: number; }){
    this.router.navigate(['/myPosts', post.id]);
  }

  deletePost(post: { id: number; }){
    this.postService.delete(post.id)
      .pipe(first())
      .subscribe(() => this.loadPosts());
  }
  editPost(post: {id :number}){
    this.router.navigate(['/posts/editing', post.id]);
  }

}
