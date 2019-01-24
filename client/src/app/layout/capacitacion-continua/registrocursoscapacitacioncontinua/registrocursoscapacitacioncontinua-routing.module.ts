import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { RegistroCursosCapacitacionContinuaComponent } from './registrocursoscapacitacioncontinua.component';

const routes: Routes = [
   { path: '', component: RegistroCursosCapacitacionContinuaComponent }
];

@NgModule({
   imports: [RouterModule.forChild(routes)],
   exports: [RouterModule]
})
export class RegistroCursosCapacitacionContinuaRoutingModule { }
