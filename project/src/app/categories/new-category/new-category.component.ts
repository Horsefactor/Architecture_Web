import { Component, OnInit } from '@angular/core';
import { CategoryService } from 'src/app/shared/categories/category.service';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';
import { Category } from 'src/app/shared/categories/category.model';
import { Router, ActivatedRoute } from '@angular/router';
import { AlertService } from 'src/app/shared/alert/alert.service';
import { first } from 'rxjs/operators';

@Component({
  selector: 'app-new-category',
  templateUrl: './new-category.component.html',
  styles: ['']
})
export class NewCategoryComponent implements OnInit {
  catForm:FormGroup;
  category : Category;
  loading = false;
  submitted = false;
  error = '';

  constructor(
    private categoryService:CategoryService,
    private formBuilder: FormBuilder,
    private router: Router,
    private alertService: AlertService,
    private route: ActivatedRoute
    
  ) { }

  ngOnInit() {
    this.catForm = this.formBuilder.group({
      title: ['', Validators.required],
      text: ['', [Validators.required, Validators.minLength(20)]]
    });

    this.route.paramMap.subscribe(params => {
      const id =+ params.get('id');
      if(id){
        this.getCategory(id);
      }
    })
  }
  getCategory(id:number){
    this.categoryService.getCategory(id)
      .pipe(first())
      .subscribe(
        (category:Category) => this.editCategory(category),
        (error:any) =>console.log(error)
      );
  }
  editCategory(category:Category){
    this.catForm.patchValue({
      text: category.text,
      title: category.title
    });
  }

  get f() { return this.catForm.controls; }

  onSubmit(){
    this.submitted= true;

    // reset alerts on submit
    this.alertService.clear();

    if (this.catForm.invalid) {
      return;
    }
    this.loading =true;

    this.categoryService.registerCategory(this.catForm.value)
        .pipe(first())
        .subscribe(
          data => {
              console.log(data);
              this.router.navigate(['/account']);
          },
          error => {
              this.alertService.error(error);
              this.loading = false;
          });
  }
}
