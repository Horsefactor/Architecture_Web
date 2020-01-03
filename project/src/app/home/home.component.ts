import { Component, OnInit } from '@angular/core';
import { AuthService } from '../shared/security/auth.service';
import { UserService } from '../shared/users/user.service';
import { first } from 'rxjs/operators';
import { User } from '../shared/users/user.model';

@Component({
  selector: 'app-home',
  templateUrl: './home.component.html',
  styles: ['']
})
export class HomeComponent implements OnInit {

  currentUser: User;
  users:User[];

  constructor( 
    private authService: AuthService,
    private userService: UserService
) {
    this.currentUser = this.authService.currentUserValue;
}

  ngOnInit() {
    this.loadAllUsers();
  }

  deleteUser(id: number) {
    this.userService.delete(id)
        .pipe(first())
        .subscribe(() => this.loadAllUsers());
  }

  private loadAllUsers() {
    this.userService.getAll()
        .pipe(first())
        .subscribe(data => {
          this.users = data['hydra:member']
          console.log(this.users);
        });
  }
}
