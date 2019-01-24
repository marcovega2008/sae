import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { HorarioCapacitacionContinuaRoutingModule } from './horariocapacitacioncontinua-routing.module';
import { HorarioCapacitacionContinuaComponent } from './horariocapacitacioncontinua.component';
import { HorarioCapacitacionContinuaService } from './horariocapacitacioncontinua.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      HorarioCapacitacionContinuaRoutingModule
   ],
   providers: [HorarioCapacitacionContinuaService],
   declarations: [HorarioCapacitacionContinuaComponent],
})
export class HorarioCapacitacionContinuaModule { }
