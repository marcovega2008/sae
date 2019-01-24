import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { FormularioInglesComponent } from './formulario-ingles.component';

const routes: Routes = [
    { path: '', component: FormularioInglesComponent }
];

@NgModule({
    imports: [RouterModule.forChild(routes)],
    exports: [RouterModule]
})
export class FormularioInglesRoutingModule { }
