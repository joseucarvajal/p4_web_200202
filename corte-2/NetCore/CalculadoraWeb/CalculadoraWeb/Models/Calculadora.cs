using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CalculadoraWeb.Models
{
    public class Calculadora
    {
        public float Number1 { get; set; }        
        public float Number2 { get; set; }        
        public float Result { get; set; }
        public string Operation { get; set; }

        public void PerformOperation()
        {
            switch (Operation)
            {
                case "s":
                    Result = Number1 + Number2;
                    break;

                case "r":
                    Result = Number1 - Number2;
                    break;

                case "m":
                    Result = Number1 * Number2;
                    break;

                case "d":
                    Result = Number1 / Number2;
                    break;
            }
        }

    }
}
