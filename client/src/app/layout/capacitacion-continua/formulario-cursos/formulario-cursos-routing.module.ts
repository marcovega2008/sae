import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { FormularioCursosComponent } from './formulario-cursos.component';

const routes: Routes = [
    { path: '', component: FormularioCursosComponent }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class FormularioCursosRoutingModule { }
