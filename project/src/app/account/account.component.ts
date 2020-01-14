import { Component, OnInit } from '@angular/core';
import { AuthService } from '../shared/security/auth.service';
import { UserService } from '../shared/users/user.service';
import { first } from 'rxjs/operators';
import { Router } from '@angular/router';

@Component({
  selector: 'app-account',
  templateUrl: 'account.component.html',
  styles: []
})
export class AccountComponent implements OnInit {

  constructor(
    private authService: AuthService,
    private userService: UserService,
    private router : Router
  ) { }

  ngOnInit() {
  }

  //delete the currentuser account
  deleteUser() {
    this.userService.delete(parseInt(this.authService.currentUserValue.id))
      .pipe(first())
      .subscribe(() => this.router.navigate(['/login']));
  }
}
