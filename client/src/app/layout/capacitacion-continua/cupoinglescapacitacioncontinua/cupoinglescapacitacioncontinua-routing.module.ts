import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { CupoInglesCapacitacionContinuaComponent } from './cupoinglescapacitacioncontinua.component';

const routes: Routes = [
   { path: '', component: CupoInglesCapacitacionContinuaComponent }
];

@NgModule({
   imports: [RouterModule.forChild(routes)],
   exports: [RouterModule]
})
export class CupoInglesCapacitacionContinuaRoutingModule { }
