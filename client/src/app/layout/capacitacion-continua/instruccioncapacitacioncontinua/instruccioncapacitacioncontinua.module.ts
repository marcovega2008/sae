import { NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';

import { InstruccionCapacitacionContinuaRoutingModule } from './instruccioncapacitacioncontinua-routing.module';
import { InstruccionCapacitacionContinuaComponent } from './instruccioncapacitacioncontinua.component';
import { InstruccionCapacitacionContinuaService } from './instruccioncapacitacioncontinua.service';

@NgModule({
   imports: [
      CommonModule,
      FormsModule,
      InstruccionCapacitacionContinuaRoutingModule
   ],
   providers: [InstruccionCapacitacionContinuaService],
   declarations: [InstruccionCapacitacionContinuaComponent],
})
export class InstruccionCapacitacionContinuaModule { }
