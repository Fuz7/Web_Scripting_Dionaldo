"use client";
import { useAuth } from "@/hooks/auth";

export default function Page({ children }: { children: React.ReactNode }) {
  useAuth({ middleware: "auth", redirectIfAuthenticated: "/" });
  return (
   <>{children}</>
  );
}
