import { Category } from '../categories/category.model';
import { User } from '../users/user.model';

export class GetPost {
    content : string;
    createdAT : Date;
    categories : [Category];
    user : User;
}
export class Post {
    content : string;
    createdAT : Date;
    categories : string;
    user : string;
}
