using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Domicilios.API.Domain;
using Domicilios.API.Infrastructure;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.EntityFrameworkCore;

namespace Domicilios.API.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class ProductosController : ControllerBase
    {
        private DomiciliosDbContext _dbContext;

        public ProductosController(DomiciliosDbContext dbContext)
        {
            _dbContext = dbContext;
        }

        [HttpGet]
        public async Task<ActionResult<IEnumerable<Producto>>> Get()
        {
            return await _dbContext.Productos.AsNoTracking().ToListAsync();
        }

        [HttpPost]        
        public async Task<ActionResult<Producto>> Create(
            [FromBody] Producto producto
        )
        {
            _dbContext.Productos.Add(producto);
            await _dbContext.SaveChangesAsync();

            return producto;

            //return StatusCode(201, producto);
        }

    }
}
