import { Component, OnInit } from '@angular/core';
import { PostService } from 'src/app/shared/posts/post.service';
import { Router } from '@angular/router';
import { GetPost } from 'src/app/shared/posts/post.model';
import { first, map } from 'rxjs/operators';
import { AuthService } from 'src/app/shared/security/auth.service';

@Component({
  selector: 'app-post-list',
  templateUrl: './post-list.component.html',
  styles: ['']
})
export class PostListComponent implements OnInit {
  posts:GetPost[];
  currentUserEmail:string;
  constructor(
    private postService : PostService, 
    private router : Router,
    private authService : AuthService
  ) { }
  

  ngOnInit() {
    this.postService.criteria.subscribe(
      (criteria) => {
        console.log(criteria);
        this.loadPosts(criteria);
      }
    );
    this.currentUserEmail = this.authService.currentUserValue.email;
  }
  //load all post in function of the criterium, all if none
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
              (post: GetPost) => {
                return (post.user.type === criteria.type) && (this.isIn(criteria.categories, post.categories));
              }
            )
          )
        )
        .subscribe((posts) => this.posts = posts);
    }
  }
  //check if a value is in an array
  isIn(criteria_array: Array<any> | string, cat_array: Array<any> | string){

    let found = false;
    if(Array.isArray(criteria_array) && Array.isArray(cat_array)){
      cat_array.forEach((elem:any[]) => {if(criteria_array.includes(elem['@id'])) found = true;});
    }
    else if(Array.isArray(cat_array) && !Array.isArray(criteria_array)){
      cat_array.forEach((elem:any[])=>{if(elem['@id'] === criteria_array) found = true;});
    }
    return found;
  }
  //path to see a post
  seePost(post: { id: number; }){
    this.router.navigate(['/posts', post.id]);
  }

  //delete a post
  deletePost(post: { id: number; }){
    this.postService.delete(post.id)
      .pipe(first())
      .subscribe(() => this.loadPosts());
  }
  //path to edit a post 
  editPost(post:{id :number; }){
    console.log(post.id);
    this.router.navigate(['/posts/edit', post.id]);
  }

}
