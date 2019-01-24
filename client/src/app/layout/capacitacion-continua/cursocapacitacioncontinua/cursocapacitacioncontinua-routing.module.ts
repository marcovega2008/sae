import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { CursoCapacitacionContinuaComponent } from './cursocapacitacioncontinua.component';

const routes: Routes = [
   { path: '', component: CursoCapacitacionContinuaComponent }
];

@NgModule({
   imports: [RouterModule.forChild(routes)],
   exports: [RouterModule]
})
export class CursoCapacitacionContinuaRoutingModule { }
