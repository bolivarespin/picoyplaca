require 'date'

class Restriccion
	def initialize()
		@ultimoDigito=[]
		@horaPico=[]
	end
	def setDia(dia)
		@dia=dia
	end	
	def addUltimoDigito(digito)
		@ultimoDigito.push digito
	end	
	def addHoraPico(hora)
		@horaPico.push hora
	end
	def getDia()
		return @dia
	end	
	def getUltimoDigito()
		return @ultimoDigito
	end
	def getHoraPico()
		return @horaPico
	end	
end

class PicoPlaca
	def initialize()
		@semana = []
	end
	def addRestriccion(dia)
		@semana.push dia
	end
	def setComprobacion(comprobacion)
		@comprobacion = comprobacion
	end	
	def comprobar()
		autoInvolucrado = 0
		tiempoInvolucrado = 0
		respuesta = 0
		vectorFecha = @comprobacion.getFecha().split("-")
		digitoPlaca = @comprobacion.getPlaca()[@comprobacion.getPlaca().length-1,1]
		horaCircula = @comprobacion.getHora()
		fecha = Date.new vectorFecha[0].to_i, vectorFecha[1].to_i, vectorFecha[2].to_i
		diaFecha = fecha.wday
		@semana.each do |i|
			if i.getDia()==diaFecha
				i.getUltimoDigito().each do |d|
					if d==digitoPlaca.to_i
						autoInvolucrado=1
						i.getHoraPico().each do |h|
							vectorHora=h.split("-")
							if vectorHora[0]<=horaCircula && horaCircula<vectorHora[1]
								tiempoInvolucrado=1
							end	
						end	
					end	
				end	
				if autoInvolucrado==1 && tiempoInvolucrado==1
					respuesta=1
				end	
			end	
		end
		return respuesta
	end	
end	

class Comprobacion
	def initialize(placa,fecha,hora)
		@placa=placa
		@fecha=fecha
		@hora=hora
	end	
	def getFecha()
		return @fecha
	end
	def getHora()
		return @hora
	end	
	def getPlaca()
		return @placa
	end	
end	


lunes = Restriccion.new()
lunes.setDia(1)
lunes.addUltimoDigito(1)
lunes.addUltimoDigito(2)
lunes.addHoraPico("07:00:00-09:30:00")
lunes.addHoraPico("16:00:00-19:30:00")

martes = Restriccion.new()
martes.setDia(2)
martes.addUltimoDigito(3)
martes.addUltimoDigito(4)
martes.addHoraPico("07:00:00-09:30:00")
martes.addHoraPico("16:00:00-19:30:00")

miercoles = Restriccion.new()
miercoles.setDia(3)
miercoles.addUltimoDigito(5)
miercoles.addUltimoDigito(6)
miercoles.addHoraPico("07:00:00-09:30:00")
miercoles.addHoraPico("16:00:00-19:30:00")

jueves = Restriccion.new()
jueves.setDia(4)
jueves.addUltimoDigito(7)
jueves.addUltimoDigito(8)
jueves.addHoraPico("07:00:00-09:30:00")
jueves.addHoraPico("16:00:00-19:30:00")

viernes = Restriccion.new()
viernes.setDia(5)
viernes.addUltimoDigito(9)
viernes.addUltimoDigito(0)
viernes.addHoraPico("07:00:00-09:30:00")
viernes.addHoraPico("16:00:00-19:30:00")

objPicoPlaca = PicoPlaca.new()
objPicoPlaca.addRestriccion(lunes)
objPicoPlaca.addRestriccion(martes)
objPicoPlaca.addRestriccion(miercoles)
objPicoPlaca.addRestriccion(jueves)
objPicoPlaca.addRestriccion(viernes)

puts "Ingrese placa del vehiculo (ejemplo:PSU-0380): "
placa=gets.chomp()
puts "Ingrese la fecha a consultar: aaaa-mm-dd (ejemplo:2016-10-15):"
fecha=gets.chomp()
puts "Ingrese la hora a consultar: hh:mm:ss (ejemplo:07:10:15):"
hora=gets.chomp()

pruebaUno = Comprobacion.new(placa,fecha,hora)
objPicoPlaca.setComprobacion(pruebaUno)
if objPicoPlaca.comprobar()==1
	puts "No puede circular"
else
	puts "Si puede circular"
end
