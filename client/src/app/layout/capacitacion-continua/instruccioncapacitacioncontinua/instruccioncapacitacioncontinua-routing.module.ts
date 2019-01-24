import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import {InstruccionCapacitacionContinuaComponent } from './instruccioncapacitacioncontinua.component';

const routes: Routes = [
   { path: '', component: InstruccionCapacitacionContinuaComponent }
];

@NgModule({
   imports: [RouterModule.forChild(routes)],
   exports: [RouterModule]
})
export class InstruccionCapacitacionContinuaRoutingModule { }
