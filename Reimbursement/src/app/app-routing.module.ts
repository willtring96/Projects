import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { LoginComponent } from 'src/app/components/login/login.component';
import { MenuComponent } from 'src/app/components/menu/menu.component';
import { SingleviewComponent } from 'src/app/components/singleview/singleview.component';
import { CreatereimbComponent } from 'src/app/components/createreimb/createreimb.component';
import { ViewReimbComponent } from 'src/app/components/view-reimb/view-reimb.component';

const routes: Routes = [
  {path: '', redirectTo: '/login', pathMatch: 'full'},
  {path: 'login', component: LoginComponent},
  {path: 'menu', component: MenuComponent},
  {path: 'detail', component: SingleviewComponent},
  {path: 'create', component: CreatereimbComponent},
  {path: 'all', component: ViewReimbComponent}
];

@NgModule({
  imports: [RouterModule.forRoot(routes)],
  exports: [RouterModule]
})
export class AppRoutingModule { }
