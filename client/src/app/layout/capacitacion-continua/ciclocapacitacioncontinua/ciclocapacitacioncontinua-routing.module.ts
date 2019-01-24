import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';
import { CicloCapacitacionContinuaComponent } from './ciclocapacitacioncontinua.component';

const routes: Routes = [
   { path: '', component: CicloCapacitacionContinuaComponent }
];

@NgModule({
   imports: [RouterModule.forChild(routes)],
   exports: [RouterModule]
})
export class CicloCapacitacionContinuaRoutingModule { }
