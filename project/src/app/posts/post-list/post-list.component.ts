import { Component, OnInit } from '@angular/core';
import { PostService } from 'src/app/shared/posts/post.service';
import { Router } from '@angular/router';
import { GetPost } from 'src/app/shared/posts/post.model';
import { first, map } from 'rxjs/operators';

@Component({
  selector: 'app-post-list',
  templateUrl: './post-list.component.html',
  styles: ['']
})
export class PostListComponent implements OnInit {
  posts:GetPost[];

  constructor(
    private postService : PostService, 
    private router : Router
  ) { }

  ngOnInit() {
    this.postService.criteria.subscribe(
      (criteria) => this.loadPosts(criteria)
    );
  }

  loadPosts(criteria=null) {
    if(criteria == null){
      this.postService.getPosts()
      .pipe(first())
      .subscribe((data) =>{
        this.posts = data['hydra:member']
      })
    }
    else{
      console.log(criteria.type);
      this.postService.getPosts()
        .pipe(
          map(
            (posts) => posts['hydra:member'].filter(
              (post: GetPost) => post.user.type === criteria.type && this.isIn(criteria.categories, post.categories[0]['@id'])
            )
          )
        )
        .subscribe((posts) => this.posts = posts)
    }
  }

  isIn(array, value){
    array.forEach((elem) => {
      if (elem === value) return true
    });
  }

  seePost(post: { id: number; }){
    this.router.navigate(['/posts', post.id]);
  }

  deletePost(post: { id: number; }){
    this.postService.delete(post.id)
      .pipe(first())
      .subscribe(() => this.loadPosts());
  }
  editPost(post:{id :number}){
    this.router.navigate(['/posts/edit', post.id]);
  }

}
