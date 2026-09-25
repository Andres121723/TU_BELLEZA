var builder = WebApplication.CreateBuilder(args);
builder.Services.AddCors(options => {
    options.AddDefaultPolicy(policy => policy.AllowAnyOrigin().AllowAnyHeader().AllowAnyMethod());
});

var app = builder.Build();
app.UseCors();

app.MapPost("/api/clientes", (ClienteDto cliente) => {
    if (string.IsNullOrEmpty(cliente.Email)) return Results.BadRequest(new { mensaje = "Email requerido" });
    return Results.Ok(new { mensaje = $"¡Bienvenido al Club VIP! {cliente.Email}" });
});

app.Run();

record ClienteDto(string Email);
