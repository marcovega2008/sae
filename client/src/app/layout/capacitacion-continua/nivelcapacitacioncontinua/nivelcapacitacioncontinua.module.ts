import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { NivelCapacitacionContinuaRoutingModule } from './nivelcapacitacioncontinua-routing.module';
import { NivelCapacitacionContinuaComponent } from './nivelcapacitacioncontinua.component';
import { NivelCapacitacionContinuaService } from './nivelcapacitacioncontinua.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      NivelCapacitacionContinuaRoutingModule
   ],
   providers: [NivelCapacitacionContinuaService],
   declarations: [NivelCapacitacionContinuaComponent],
})
export class NivelCapacitacionContinuaModule { }
