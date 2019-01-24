import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { PerfilCursosComponent } from './perfil-cursos.component';

const routes: Routes = [
    { path: '', component: PerfilCursosComponent }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class PerfilCursosRoutingModule { }
