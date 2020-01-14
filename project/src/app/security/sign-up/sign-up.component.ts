import { Component, OnInit } from '@angular/core';
import { FormGroup, FormBuilder, Validators } from '@angular/forms';
import { UserService } from 'src/app/shared/users/user.service';
import { Router } from '@angular/router';
import { AuthService } from 'src/app/shared/security/auth.service';
import { AlertService } from 'src/app/shared/alert/alert.service';
import { first } from 'rxjs/operators';
import { User } from 'src/app/shared/users/user.model';

@Component({
  selector: 'app-sign-up',
  templateUrl: './sign-up.component.html',
  styles: ['']
})
export class SignUpComponent implements OnInit {
    registerForm: FormGroup;
    loading = false;
    submitted = false;
    edit = false;

    constructor(
        private formBuilder: FormBuilder,
        private router: Router,
        private authService: AuthService,
        private userService: UserService,
        private alertService: AlertService
    ) {
      //redirect to home if already logged in
      if (this.authService.currentUserValue && this.router.url !== '/account/edit' ) {
        this.router.navigate(['/']);
      }
    }

  //init the form
  ngOnInit() {
    this.registerForm = this.formBuilder.group({
      password: ['', [Validators.required, Validators.minLength(6)]],
      name: ['', Validators.required],
      surname: ['', Validators.required],
      email: ['', Validators.required],
      address: ['', Validators.required],
      age: [null, Validators.required],
      phoneNumber: ['', Validators.required],
      type: ['Applicant', Validators.required]
  });
    //load current user information if in edit mode
    if(this.router.url == '/account/edit' ){
      this.edit = true;
      this.editUser(this.authService.currentUserValue);
    }
        
  }
  //patch the form
  editUser(user:User){
    this.registerForm.patchValue({
      name: user.name,
      surname: user.surname,
      age: user.age,
      email: user.email,
      phoneNumber: user.phoneNumber,
      address: user.address,
      type: user.type,
      password: user.password
    });
  }

  // convenience getter for easy access to form fields
  get f() { return this.registerForm.controls; }

  onSubmit(){
    this.submitted = true;

    // reset alerts on submit
    this.alertService.clear();

    // stop here if form is invalid
    if (this.registerForm.invalid) {
        return;
    }

    this.loading = true;

    if(this.edit){
      this.userService.editUser(this.registerForm.value)
        .pipe(first())
        .subscribe(
          data => {this.router.navigate(['/account'])},
          error => {this.loading = false}
        )
    }
    
    else {
      this.userService.registerUser(this.registerForm.value)
        .pipe(first())
        .subscribe(
            data => {
                this.alertService.success('Registration successful', true);
                this.router.navigate(['/login']);
            },
            error => {
                this.alertService.error(error);
                this.loading = false;
            });
    }
  }
}
