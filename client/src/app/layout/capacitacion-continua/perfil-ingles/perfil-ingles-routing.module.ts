import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { PerfilInglesComponent } from './perfil-ingles.component';

const routes: Routes = [
    { path: '', component: PerfilInglesComponent }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class PerfilInglesRoutingModule { }
