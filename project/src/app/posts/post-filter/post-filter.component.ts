import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, FormArray, FormControl, Validators } from '@angular/forms';
import { CategoryJson } from 'src/app/shared/categories/category.model';
import { CategoryService } from 'src/app/shared/categories/category.service';
import { PostService } from 'src/app/shared/posts/post.service';

@Component({
  selector: 'app-post-filter',
  templateUrl: './post-filter.component.html',
  styles: ['']
})
export class PostFilterComponent implements OnInit {
  public filterForm: FormGroup;
  public loading = false;
  public submitted = false;
  public categories: CategoryJson[];
  
  constructor(
    private formBuilder: FormBuilder,
    private categoryService: CategoryService,
    private postService: PostService
  ) { }

  ngOnInit() {
    this.filterForm = this.formBuilder.group({
      categories: new FormArray([]),
      type: ['Applicant', Validators.required]
    }) 

    this.addCheckboxes();
  }

  //add checkboxes to the form
  addCheckboxes(){
    this.categoryService.getCategoriesJson()
      .subscribe(
        (categories) => {
          this.categories = categories;
          this.categories.forEach((o,i) => {
            const control = new FormControl(i === 0); // if first item set to true, else false
            (this.filterForm.controls.categories as FormArray).push(control);
          });
        }
      )
  }
  // convenience getter for easy access to form fields
  get f() {return this.filterForm.controls}

  onSubmit(){
    this.submitted = true;

    //map checkboxes value assigned to true with their right name
    this.filterForm.value.categories = this.filterForm.value.categories
      .map((v, i) => v ? this.categories[i].id : null)
      .filter(v => v !== null);

    this.loading = true;

    //use a service to transfer data between sibling component
    this.postService.changeCriteria(this.filterForm.value);
  }

}
