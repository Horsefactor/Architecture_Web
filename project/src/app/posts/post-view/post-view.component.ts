import { Component, OnInit } from '@angular/core';
import { ActivatedRoute } from '@angular/router';
import { PostService } from 'src/app/shared/posts/post.service';
import { GetPost } from 'src/app/shared/posts/post.model';

@Component({
  selector: 'app-post-view',
  templateUrl: './post-view.component.html',
  styleUrls: ['./post-view.component.scss']
})
export class PostViewComponent implements OnInit {
  post: GetPost;
  
  constructor(
    private route: ActivatedRoute,
    private postService: PostService
  ) { }

  ngOnInit() {
    console.log(parseInt(this.route.snapshot.paramMap.get('id')));
    return this.postService.getPost(parseInt(this.route.snapshot.paramMap.get('id')))
      .subscribe((data) =>{
        console.log(data);
        this.post = data
      })

  }
  

}
