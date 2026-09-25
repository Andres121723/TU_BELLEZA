package com.salon.api;

import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.web.bind.annotation.*;
import java.util.*;

@SpringBootApplication
@RestController
@RequestMapping("/api/servicios")
@CrossOrigin(origins = "*")
public class ServicioController {

    public static void main(String[] args) {
        SpringApplication.run(ServicioController.class, args);
    }

    @GetMapping
    public List<Map<String, Object>> getServicios() {
        List<Map<String, Object>> servicios = new ArrayList<>();
        servicios.add(Map.of("id", 1, "nombre", "Corte y Peinado", "precio", 25.00));
        servicios.add(Map.of("id", 2, "nombre", "Manicura Spa", "precio", 15.00));
        return servicios;
    }
}
