import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { EmpresaCapacitacionContinuaComponent } from './empresacapacitacioncontinua.component';

const routes: Routes = [
   { path: '', component: EmpresaCapacitacionContinuaComponent }
];

@NgModule({
   imports: [RouterModule.forChild(routes)],
   exports: [RouterModule]
})
export class EmpresaCapacitacionContinuaRoutingModule { }
