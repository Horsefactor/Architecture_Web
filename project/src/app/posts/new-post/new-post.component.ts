import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators, FormArray, FormControl } from '@angular/forms';
import { Router, ActivatedRoute } from '@angular/router';
import { AlertService } from 'src/app/shared/alert/alert.service';
import { PostService } from 'src/app/shared/posts/post.service';
import { first } from 'rxjs/operators';
import { CategoryService } from 'src/app/shared/categories/category.service';
import { CategoryJson } from 'src/app/shared/categories/category.model';
import { GetPost } from 'src/app/shared/posts/post.model';

@Component({
  selector: 'app-new-post',
  templateUrl: './new-post.component.html',
  styles: ['']
})
export class NewPostComponent implements OnInit {
  postForm: FormGroup;
  loading = false;
  submitted = false;
  edit = false;
  public categories: CategoryJson[];

  constructor(
        private formBuilder: FormBuilder,
        private router: Router,
        private postService: PostService,
        private alertService: AlertService,
        private categoryService: CategoryService,
        private route: ActivatedRoute
  ) {}
  
  //init the form
  ngOnInit() {
    this.postForm = this.formBuilder.group({
      content: ['', [Validators.required, Validators.minLength(50)]],
      categories: new FormArray([])
      });
      
      this.addCheckboxes();
      //patch the form thanks to the post id if in editmode
      this.route.paramMap.subscribe(params => {
        const id =+ params.get('id');
        if(id){
          this.edit = true;
          this.getPost(id);
        }
      })
  }
  //get a post by his id to patch the form
  getPost(id:number){
    this.postService.getPost(id)
      .pipe(first())
      .subscribe(
        (post:GetPost) => this.editPost(post),
        (error:any) =>console.log(error)
      );
  }
  //patch the post
  editPost(post:GetPost){
    this.postForm.patchValue({
      content: post.content
    });
  }
  //add categories checkboxes to the form
  addCheckboxes(){
    this.categoryService.getCategoriesJson()
      .subscribe(
        (categories) => {
          this.categories = categories;
          this.categories.forEach((o,i) => {
            const control = new FormControl(i === 0); // if first item set to true, else false
            (this.postForm.controls.categories as FormArray).push(control);
          });
        })
  }
  

  // convenience getter for easy access to form fields
  get f() {return this.postForm.controls}

  onSubmit(){
    this.submitted=true;

    // reset alerts on submit
    this.alertService.clear();

    // stop here if form is invalid
    if (this.postForm.invalid) {
      return;
    }
    
    //map checkboxes value assigned to true with their right name
    this.postForm.value.categories = this.postForm.value.categories
      .map((v, i) => v ? this.categories[i].id : null)
      .filter(v => v !== null);
    
    this.loading = true;

    if(this.edit){
      this.postService.editPost(this.postForm.value, parseInt(this.route.snapshot.paramMap.get('id')))
        .pipe(first())
        .subscribe(
          data => {
            this.alertService.success('Post successfully saved', true);
            this.router.navigate(['/myPosts'])
          },
          error => {
            this.alertService.error(error);
            this.loading = false;
          }
        )
    }

    else{
      this.postService.addPost(this.postForm.value)
        .pipe(first())
        .subscribe(
          data => {
            this.alertService.success('Post successfully added', true);
            this.router.navigate(['/myPosts']);
          },
          error => {
            this.alertService.error(error);
            this.loading=false;
          }
        )
    }
  }
}
