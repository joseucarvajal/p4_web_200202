using Domicilios.API.Domain;
using Microsoft.EntityFrameworkCore;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Domicilios.API.Infrastructure
{
    public class DomiciliosDbContext : DbContext
    {
        public DomiciliosDbContext(DbContextOptions<DomiciliosDbContext> options)
            : base(options)

        {

        }

        public DbSet<Producto> Productos { get; set; }
        public DbSet<Domicilio> Domicilios { get; set; }
    }
}
