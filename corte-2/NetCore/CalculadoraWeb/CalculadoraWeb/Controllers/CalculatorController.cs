using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using CalculadoraWeb.Models;
using Microsoft.AspNetCore.Mvc;

namespace CalculadoraWeb.Controllers
{
    public class CalculatorController : Controller
    {
        public IActionResult Index()
        {
            return Ok("Hola mundo");
        }

        [Route("Calculator/calc/{n1}/{n2}/{op}")]
        public IActionResult Calculate(
            [FromRoute] float n1,
            [FromRoute] float n2,
            [FromRoute] string op
        )
        {
            Calculadora c = new Calculadora();
            c.Number1 = n1;
            c.Number2 = n2;
            c.Operation = op;

            c.PerformOperation();

            return Ok($"Result: {c.Result}");
        }

        [HttpPost]
        public IActionResult Calculate([FromBody] Calculadora calc)
        {
            calc.PerformOperation();
            return Ok($"Result: {calc.Result}");
        }
    }
}
