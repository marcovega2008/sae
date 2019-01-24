import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { MatriculaInglesCapacitacionContinuaRoutingModule } from './matriculainglescapacitacioncontinua-routing.module';
import { MatriculaInglesCapacitacionContinuaComponent } from './matriculainglescapacitacioncontinua.component';
import { MatriculaInglesCapacitacionContinuaService } from './matriculainglescapacitacioncontinua.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      MatriculaInglesCapacitacionContinuaRoutingModule
   ],
   providers: [MatriculaInglesCapacitacionContinuaService],
   declarations: [MatriculaInglesCapacitacionContinuaComponent],
})
export class MatriculaInglesCapacitacionContinuaModule { }
