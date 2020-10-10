using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.AspNetCore.Builder;
using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.Http;
using Microsoft.Extensions.DependencyInjection;
using Microsoft.Extensions.Hosting;

namespace Calculadora
{
    public class Startup
    {
        // This method gets called by the runtime. Use this method to add services to the container.
        // For more information on how to configure your application, visit https://go.microsoft.com/fwlink/?LinkID=398940
        public void ConfigureServices(IServiceCollection services)
        {
        }

        // This method gets called by the runtime. Use this method to configure the HTTP request pipeline.
        public void Configure(IApplicationBuilder app, IWebHostEnvironment env)
        {
            if (env.IsDevelopment())
            {
                app.UseDeveloperExceptionPage();
            }

            app.UseRouting();

            app.UseEndpoints(endpoints =>
            {
                endpoints.MapGet("/", async context =>
                {
                    await context.Response.WriteAsync("Hello World!");
                });

                endpoints.MapGet("/calcular/{n1}/{n2}", async context =>
                {
                    object on1 = context.Request.RouteValues.GetValueOrDefault<string, object>("n1");
                    object on2 = context.Request.RouteValues.GetValueOrDefault<string, object>("n2");

                    int n1 = int.Parse(on1 as string);
                    int n2 = int.Parse(on2 as string);
                    int resultado = n1 + n2;

                    await context.Response.WriteAsync($"El resultado es: {resultado}");
                });

            });
        }
    }
}
