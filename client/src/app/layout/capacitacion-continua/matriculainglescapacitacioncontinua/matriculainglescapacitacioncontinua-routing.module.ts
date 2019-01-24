import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { MatriculaInglesCapacitacionContinuaComponent } from './matriculainglescapacitacioncontinua.component';

const routes: Routes = [
   { path: '', component: MatriculaInglesCapacitacionContinuaComponent }
];

@NgModule({
   imports: [RouterModule.forChild(routes)],
   exports: [RouterModule]
})
export class MatriculaInglesCapacitacionContinuaRoutingModule { }
