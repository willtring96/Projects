import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { HomeComponent } from 'src/app/components/home/home.component';
import { LoginComponent } from 'src/app/components/login/login.component';
import { CreateLocationComponent} from 'src/app/components/create-location/create-location.component';
import { AllComponent } from 'src/app/components/all/all.component';
import { UserProfileComponent } from 'src/app/components/user-profile/user-profile.component';
import { DetailsComponent } from 'src/app/components/details/details.component';
import { RegisterComponent } from 'src/app/components/register/register.component';

const routes: Routes = [
  {path: '', redirectTo: '/home', pathMatch: 'full'},
  {path: "home", component: HomeComponent},
  {path: "login", component: LoginComponent},
  {path: "create", component: CreateLocationComponent},
  {path: "all", component: AllComponent},
  {path: "profile", component: UserProfileComponent},
  {path: "details", component: DetailsComponent },
  {path: "register", component: RegisterComponent }

];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
