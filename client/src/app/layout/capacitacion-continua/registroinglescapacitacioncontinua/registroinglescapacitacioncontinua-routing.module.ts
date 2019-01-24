import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { RegistroInglesCapacitacionContinuaComponent } from './registroinglescapacitacioncontinua.component';

const routes: Routes = [
   { path: '', component: RegistroInglesCapacitacionContinuaComponent }
];

@NgModule({
   imports: [RouterModule.forChild(routes)],
   exports: [RouterModule]
})
export class RegistroInglesCapacitacionContinuaRoutingModule { }
