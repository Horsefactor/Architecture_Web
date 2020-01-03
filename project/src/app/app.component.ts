import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { AuthService } from './shared/security/auth.service';
import { User } from './shared/users/user.model';
import { first } from 'rxjs/operators';
import { PostService } from './shared/posts/post.service';
import { GetPost } from './shared/posts/post.model';
import { FormGroup, Validators, FormBuilder } from '@angular/forms';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styles: ['']
})
export class AppComponent {
  title = 'project';
  currentUser: User;
  searchByIdForm:FormGroup;

  constructor(
    private router: Router,
    private authService: AuthService,
    private formBuilder: FormBuilder
  ) {
      this.authService.currentUser.subscribe(x => this.currentUser = x);
      this.searchByIdForm = this.formBuilder.group({
        id: [null, Validators.pattern("^(0|[1-9][0-9]*)")]
      })
  }

  logout() {
      this.authService.logout();
      this.router.navigate(['/login']);
  }

  searchById(id:number){
    this.router.navigate(['/posts', id]);
  }

  onSubmit(){
    this.searchById(this.searchByIdForm.value.id);
  }
}
