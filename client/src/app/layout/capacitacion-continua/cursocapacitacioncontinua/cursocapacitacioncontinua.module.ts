import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { CursoCapacitacionContinuaRoutingModule } from './cursocapacitacioncontinua-routing.module';
import { CursoCapacitacionContinuaComponent } from './cursocapacitacioncontinua.component';
import { CursoCapacitacionContinuaService } from './cursocapacitacioncontinua.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      CursoCapacitacionContinuaRoutingModule
   ],
   providers: [CursoCapacitacionContinuaService],
   declarations: [CursoCapacitacionContinuaComponent],
})
export class CursoCapacitacionContinuaModule { }
