using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Domicilios.API.Domain
{
    public class Domicilio
    {
        public Guid Id { get; set; }
        public string Direccion { get; set; }
        public float Precio { get; set; }
        public int Hora { get; set; }

        public Producto Producto { get; set; }
        private Guid _idProducto;

    }
}
