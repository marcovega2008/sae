import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { RegistroCursosCapacitacionContinuaRoutingModule } from './registrocursoscapacitacioncontinua-routing.module';
import { RegistroCursosCapacitacionContinuaComponent } from './registrocursoscapacitacioncontinua.component';
import { RegistroCursosCapacitacionContinuaService } from './registrocursoscapacitacioncontinua.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      RegistroCursosCapacitacionContinuaRoutingModule
   ],
   providers: [RegistroCursosCapacitacionContinuaService],
   declarations: [RegistroCursosCapacitacionContinuaComponent],
})
export class RegistroCursosCapacitacionContinuaModule { }
