import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { CupoInglesCapacitacionContinuaRoutingModule } from './cupoinglescapacitacioncontinua-routing.module';
import { CupoInglesCapacitacionContinuaComponent } from './cupoinglescapacitacioncontinua.component';
import { CupoInglesCapacitacionContinuaService } from './cupoinglescapacitacioncontinua.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      CupoInglesCapacitacionContinuaRoutingModule
   ],
   providers: [CupoInglesCapacitacionContinuaService],
   declarations: [CupoInglesCapacitacionContinuaComponent],
})
export class CupoInglesCapacitacionContinuaModule { }
