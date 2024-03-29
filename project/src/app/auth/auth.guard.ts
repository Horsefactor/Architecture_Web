import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree, Router } from '@angular/router';
import { Observable } from 'rxjs';
import { AuthService } from '../shared/security/auth.service';

@Injectable({providedIn: 'root'})

export class AuthGuard implements CanActivate {
  
  constructor(
    private authService: AuthService, 
    private router: Router
  ){}
  
  //check if the user who call this action is connected
  canActivate(route: ActivatedRouteSnapshot, state: RouterStateSnapshot){
    const currentUser = this.authService.currentUserValue;
    if (currentUser){
      // logged in so return true
      return true;
    }

    //not logged in so redirect to login page with the return url
    this.router.navigate(['/login'], {queryParams: { returnUrl: state.url}})
    return false;
  }
  
}
